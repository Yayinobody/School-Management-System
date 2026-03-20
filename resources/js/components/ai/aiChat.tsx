import { useState, useRef, useEffect } from 'react';
import { MessageCircle, X, Send } from 'lucide-react';

// Added a type for messages to distinguish sender
type Message = {
    text: string;
    sender: 'user' | 'ai';
};

export default function AiChat() {
    const [open, setOpen] = useState(false);
    const [message, setMessage] = useState('');
    const [messages, setMessages] = useState<Message[]>([
        { text: 'Hello! How can I help you today?', sender: 'ai' },
    ]);

    const scrollRef = useRef<HTMLDivElement>(null);

    // Auto-scroll to bottom whenever messages update
    useEffect(() => {
        if (scrollRef.current) {
            scrollRef.current.scrollTop = scrollRef.current.scrollHeight;
        }
    }, [messages, open]);

    const sendMessage = () => {
        if (!message.trim()) return;

        // Add user message
        const newMessages = [
            ...messages,
            { text: message, sender: 'user' as const },
        ];
        setMessages(newMessages);
        setMessage('');

        // Simulate an AI response after 600ms
        setTimeout(() => {
            setMessages((prev) => [
                ...prev,
                { text: "I'm processing your request...", sender: 'ai' },
            ]);
        }, 600);
    };

    return (
        <div className="fixed right-6 bottom-6 z-50 flex flex-col items-end font-sans">
            {/* Chat Window */}
            {open && (
                <div className="mb-4 flex h-[450px] w-85 animate-in flex-col overflow-hidden rounded-2xl border bg-white shadow-2xl transition-all duration-200 fade-in zoom-in dark:border-zinc-800 dark:bg-[#111]">
                    {/* Header */}
                    <div className="flex items-center justify-between border-b bg-white p-4 dark:bg-[#111]">
                        <div className="flex items-center gap-2">
                            <div className="h-2 w-2 animate-pulse rounded-full bg-green-500"></div>
                            <span className="font-bold tracking-tight">
                                NORSU AI
                            </span>
                        </div>
                        <button
                            onClick={() => setOpen(false)}
                            className="rounded-full p-1 transition-colors hover:bg-gray-100 dark:hover:bg-zinc-800"
                        >
                            <X size={20} />
                        </button>
                    </div>

                    {/* Chat Area */}
                    <div
                        ref={scrollRef}
                        className="flex-1 space-y-4 overflow-y-auto scroll-smooth p-4"
                    >
                        {messages.map((msg, index) => (
                            <div
                                key={index}
                                className={`flex ${msg.sender === 'user' ? 'justify-end' : 'justify-start'}`}
                            >
                                <div
                                    className={`max-w-[80%] rounded-2xl px-4 py-2 text-sm shadow-sm ${
                                        msg.sender === 'user'
                                            ? 'rounded-br-none bg-brand text-white' // Uses your brand color
                                            : 'rounded-bl-none bg-gray-100 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-200'
                                    }`}
                                >
                                    {msg.text}
                                </div>
                            </div>
                        ))}
                    </div>

                    {/* Input Area */}
                    <div className="border-t bg-gray-50 p-4 dark:bg-[#181818]">
                        <div className="relative flex items-center">
                            <input
                                type="text"
                                value={message}
                                onChange={(e) => setMessage(e.target.value)}
                                onKeyDown={(e) =>
                                    e.key === 'Enter' && sendMessage()
                                }
                                placeholder="Write a message..."
                                className="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 pr-12 text-sm focus:border-brand focus:ring-2 focus:ring-brand/20 focus:outline-none dark:border-zinc-700 dark:bg-zinc-900"
                            />
                            <button
                                onClick={sendMessage}
                                className="absolute right-2 p-2 text-brand transition-transform hover:scale-110"
                            >
                                <Send size={18} />
                            </button>
                        </div>
                    </div>
                </div>
            )}

            {/* Toggle Button */}
            <button
                onClick={() => setOpen(!open)}
                className="flex items-center gap-2 rounded-full bg-brand px-6 py-3.5 font-bold text-white shadow-xl transition-all hover:shadow-brand/20 active:scale-95"
            >
                {open ? <X size={22} /> : <MessageCircle size={22} />}
                <span>{open ? 'Close' : 'NORSU AI'}</span>
            </button>
        </div>
    );
}
