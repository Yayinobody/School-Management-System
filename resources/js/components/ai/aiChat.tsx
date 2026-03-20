import { useState } from 'react';
import { MessageCircle, X } from 'lucide-react';

export default function AiChat() {
    const [open, setOpen] = useState(false);
    const [message, setMessage] = useState('');
    const [messages, setMessages] = useState<string[]>([]);

    const sendMessage = () => {
        if (!message.trim()) return;

        setMessages([...messages, message]);
        setMessage('');
    };
    return (
        <div className="fixed right-6 bottom-6 z-50">
            {open && (
                <div className="mb-4 flex h-96 w-80 flex-col rounded-xl bg-white shadow-2xl dark:bg-[#111]">
                    <div className="flex items-center justify-between border-b p-3">
                        <span className="font-semibold">AI Assistant</span>
                        <button onClick={() => setOpen(false)}>
                            <X size={18} />
                        </button>
                    </div>

                    <div className="flex-1 overflow-y-auto p-3">
                        {messages.map((msg, index) => (
                            <div
                                key={index}
                                className="mb-2 rounded-md bg-gray-200 p-2 text-sm"
                            >
                                {msg}
                            </div>
                        ))}
                    </div>

                    <div className="border-t p-3">
                        <input
                            type="text"
                            value={message}
                            onChange={(e) => setMessage(e.target.value)}
                            onKeyDown={(e) => {
                                if (e.key === 'Enter') sendMessage();
                            }}
                            placeholder="Ask something..."
                            className="w-full rounded-md border px-3 py-2 text-sm"
                        />
                    </div>
                </div>
            )}

            <button
                onClick={() => setOpen(!open)}
                className="flex items-center gap-2 rounded-full bg-cyan-500 px-5 py-3 font-semibold text-white shadow-lg hover:scale-105"
            >
                <MessageCircle size={18} />
                NORSU AI
            </button>
        </div>
    );
}
