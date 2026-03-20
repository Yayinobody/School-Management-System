import { useState, useRef, useEffect } from 'react';
import { MessageCircle, X, Send, Loader2 } from 'lucide-react';
import { usePage } from '@inertiajs/react';
import ReactMarkdown from 'react-markdown';

type Message = {
    text: string;
    sender: 'user' | 'ai';
};

export default function AiChat() {
    const { auth } = usePage().props;
    const user = auth?.user;
    const [open, setOpen] = useState(false);
    const [message, setMessage] = useState('');
    const [isLoading, setIsLoading] = useState(false);
    const [messages, setMessages] = useState<Message[]>([
        {
            text: `Hello ${user?.name ?? 'Guest'}! How can I help you today?`,
            sender: 'ai',
        },
    ]);

    const suggestions = [
        'What is Quiet Week in NORSU?',
        'When is enrollment?',
        'What are the admission requirements?',
        'How to request TOR?',
    ];

    const scrollRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        if (scrollRef.current) {
            scrollRef.current.scrollTop = scrollRef.current.scrollHeight;
        }
    }, [messages, open, isLoading]);

    const handleChat = async (textToSend: string) => {
        if (!textToSend.trim() || isLoading) return;

        setMessages((prev) => [...prev, { text: textToSend, sender: 'user' }]);

        if (textToSend === message) setMessage('');

        setIsLoading(true);

        try {
            const res = await fetch('/api/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    question: textToSend,
                    role: user?.role ?? 'guest',
                    context: {},
                }),
            });

            const data = await res.json();

            setMessages((prev) => [
                ...prev,
                {
                    text: data.answer ?? "Sorry, I didn't understand that.",
                    sender: 'ai',
                },
            ]);
        } catch (error) {
            setMessages((prev) => [
                ...prev,
                { text: 'Error connecting to AI server.', sender: 'ai' },
            ]);
        } finally {
            setIsLoading(false);
        }
    };

    return (
        <div className="fixed right-6 bottom-6 z-50 flex flex-col items-end font-sans text-zinc-900 dark:text-zinc-100">
            {open && (
                <div className="mb-4 flex h-[450px] w-85 animate-in flex-col overflow-hidden rounded-2xl border bg-white shadow-2xl transition-all duration-200 fade-in zoom-in dark:border-zinc-800 dark:bg-[#111]">
                    <div className="flex items-center justify-between border-b bg-white p-4 dark:bg-[#111]">
                        <div className="flex items-center gap-2">
                            <div
                                className={`h-2 w-2 rounded-full ${isLoading ? 'animate-bounce bg-amber-400' : 'bg-green-500'}`}
                            ></div>
                            <span className="font-bold tracking-tight text-brand">
                                NORSU AI
                            </span>
                        </div>
                        <button
                            onClick={() => setOpen(false)}
                            className="rounded-full p-1 hover:bg-gray-100 dark:hover:bg-zinc-800"
                        >
                            <X size={20} />
                        </button>
                    </div>

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
                                            ? 'rounded-br-none bg-brand text-white'
                                            : 'rounded-bl-none bg-gray-100 dark:bg-zinc-800 dark:text-zinc-200'
                                    }`}
                                >
                                    <ReactMarkdown>{msg.text}</ReactMarkdown>
                                </div>
                            </div>
                        ))}

                        {messages.length === 1 && !isLoading && (
                            <div className="space-y-2">
                                <div className="flex flex-wrap justify-end gap-2">
                                    {suggestions.map((s, i) => (
                                        <button
                                            key={i}
                                            onClick={() => handleChat(s)}
                                            className="rounded-full border border-gray-300 bg-white px-3 py-1 text-xs shadow-sm transition hover:bg-gray-100 dark:border-zinc-700 dark:bg-zinc-900 dark:hover:bg-zinc-800"
                                        >
                                            {s}
                                        </button>
                                    ))}
                                </div>
                            </div>
                        )}

                        {isLoading && (
                            <div className="flex justify-start">
                                <div className="max-w-[80%] rounded-2xl rounded-bl-none bg-gray-100 px-4 py-3 shadow-sm dark:bg-zinc-800">
                                    <div className="flex gap-1">
                                        <span className="h-1.5 w-1.5 animate-bounce rounded-full bg-zinc-400 [animation-delay:-0.3s]"></span>
                                        <span className="h-1.5 w-1.5 animate-bounce rounded-full bg-zinc-400 [animation-delay:-0.15s]"></span>
                                        <span className="h-1.5 w-1.5 animate-bounce rounded-full bg-zinc-400"></span>
                                    </div>
                                </div>
                            </div>
                        )}
                    </div>

                    <div className="border-t bg-gray-50 p-4 dark:bg-[#181818]">
                        <div className="relative flex items-center">
                            <input
                                type="text"
                                value={message}
                                disabled={isLoading}
                                onChange={(e) => setMessage(e.target.value)}
                                onKeyDown={(e) =>
                                    e.key === 'Enter' && handleChat(message)
                                }
                                placeholder={
                                    isLoading
                                        ? 'AI is thinking...'
                                        : 'Write a message...'
                                }
                                className="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 pr-12 text-sm focus:border-brand focus:ring-2 focus:ring-brand/20 focus:outline-none disabled:opacity-70 dark:border-zinc-700 dark:bg-zinc-900"
                            />
                            <button
                                onClick={() => handleChat(message)}
                                disabled={isLoading || !message.trim()}
                                className="absolute right-2 p-2 text-brand transition-transform hover:scale-110 disabled:opacity-50 disabled:hover:scale-100"
                            >
                                {isLoading ? (
                                    <Loader2
                                        size={18}
                                        className="animate-spin"
                                    />
                                ) : (
                                    <Send size={18} />
                                )}
                            </button>
                        </div>
                    </div>
                </div>
            )}

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
