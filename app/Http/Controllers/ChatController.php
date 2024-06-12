<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chatmessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        // if (session('prefix') == 'admin') {
        //     $chatusers = User::where('role', '!=', '1')->get();
        // } elseif (session('prefix') == 'agent') {
        //     $chatusers = User::where('role', '=', '1')->get();
        // }

        // return view('chat.chatadmin', compact('chatusers'));



        $chatusers = collect();

    if (session('prefix') == 'admin') {
        // Subquery to get the maximum timestamp of messages for each user
        $subQuery = Chatmessage::selectRaw('MAX(created_at) as last_chat_at, sender_id')
            ->whereHas('receiver', function ($query) {
                $query->where('role', '=', '1'); // Admin role
            })
            ->groupBy('sender_id');

        // Retrieve all users and sort them based on whether they have chatted with the admin
        $chatusers = User::where('id', '!=', auth()->id())
            ->leftJoinSub($subQuery, 'last_chats', function ($join) {
                $join->on('users.id', '=', 'last_chats.sender_id');
            })
            ->orderByRaw('IFNULL(last_chats.last_chat_at, 0) DESC')
            ->get();
    } elseif (session('prefix') == 'agent') {
        // Get all users with role '1' (assuming '1' represents agents)
        $chatusers = User::where('role', '=', '1')->get();
    }

    return view('chat.chatadmin', compact('chatusers'));

    }

    public function viewChat($id)
    {
        $user = User::findOrFail($id);
        return view('chat.viewchat', compact('user'));
    }

    public function fetchMessages($id)
    { 
        $messages = Chatmessage::with(['sender', 'receiver'])
        ->where(function ($query) use ($id) {
            $query->where('sender_id', auth()->id())
                  ->where('receiver_id', $id);
        })
        ->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                  ->where('receiver_id', auth()->id());
        })
        ->get();
// dd($messages);
  // Add profile image URLs to messages
  foreach ($messages as $message) {
    $message->sender_image = $message->sender->profile
        ? asset('assets/img/' . $message->sender->profile)
        : asset('assets/img/default.jpg');
    $message->receiver_image = $message->receiver->profile
        ? asset('assets/img/' . $message->receiver->profile)
        : asset('assets/img/default.jpg');
}
// dd($messages);
        return response()->json($messages);
    }

    // public function sendMessage(Request $request)
    // {
    //     $message = new Chatmessage();
    //     $message->sender_id = auth()->id();
    //     $message->receiver_id = $request->receiver_id;
    //     $message->message = $request->message;
    //     $message->type = $request->type;

    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $path = $file->store('chat_files');
    //         $message->path = $path;
    //     }

    //     $message->save();

    //     return response()->json($message);
    // }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string|max:500',
            'receiver_id' => 'required|integer|exists:users,id',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,pdf,webm|max:10240', // 10MB max size
        ]);
    
        $message = new Chatmessage();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->type = 'text'; // Default to 'text', will change later if a file is uploaded
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $fileExtension;
            $filePath = 'assets/chatimg/' . $fileName; // File path
    
            // Move the file to the specified directory
            $file->move(public_path('assets/chatimg'), $fileName);
    
            // Set message type to the actual file type
            if (in_array($fileExtension, ['jpg', 'jpeg', 'png'])) {
                $message->type = 'image';
            } elseif (in_array($fileExtension, ['mp4'])) {
                $message->type = 'video';
            } elseif (in_array($fileExtension, ['pdf'])) {
                $message->type = 'pdf';
            }
    
            $message->path = $filePath;
        }
    
        $message->save();
    
        return response()->json(['status' => 'Message sent!']);
    }
    
}
