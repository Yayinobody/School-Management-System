import { Head, Link, usePage } from '@inertiajs/react';
import { dashboard, login, register } from '@/routes';
import {
    ShieldCheck,
    GraduationCap,
    BookOpen,
    ChevronRight,
} from 'lucide-react';
import AppearanceToggleTab from '@/components/appearance-tabs';

export default function Welcome({
    canRegister = true,
}: {
    canRegister?: boolean;
}) {
    const { auth } = usePage().props as any;

    return (
        <>
            <Head title="University Management System">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link
                    href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700"
                    rel="stylesheet"
                />
            </Head>
            <div className="min-h-screen bg-[#FDFDFC] font-sans text-[#1b1b18] selection:bg-cyan-100 dark:bg-[#0a0a0a] dark:text-[#EDEDEC]">
                <header className="flex items-center justify-between border-b border-gray-100 px-8 py-5 lg:px-24 dark:border-[#1e1e1e]">
                    <div className="group flex cursor-default items-center gap-2">
                        <img
                            src="/norsu.png"
                            alt="NORSU Logo"
                            className="h-12 w-auto object-contain"
                        />
                        <span className="text tracking-tigh text-xl font-bold text-brand uppercase">
                            NORSU{' '}
                            <span className="font-light text-gray-500">
                                Portal
                            </span>
                        </span>
                    </div>
                    <nav className="flex items-center gap-8">
                        {auth.user ? (
                            <Link
                                href={dashboard()}
                                className="text-sm font-semibold transition-colors hover:text-cyan-500"
                            >
                                Access Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={login()}
                                    className="text-sm font-semibold text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                >
                                    Institutional Login
                                </Link>
                                {canRegister && (
                                    <Link
                                        href={register()}
                                        className="rounded bg-brand px-6 py-2 text-sm font-bold text-white shadow-lg shadow-cyan-500/20 transition-transform hover:scale-105 active:scale-95"
                                    >
                                        Create Account
                                    </Link>
                                )}
                            </>
                        )}
                        <AppearanceToggleTab />
                    </nav>
                </header>

                <main className="px-8 py-16 lg:px-24 lg:py-28">
                    {/* Hero Section */}
                    <div className="mb-20 max-w-5xl">
                        <h1 className="mb-8 text-4xl leading-tight font-bold tracking-tight lg:text-6xl">
                            Integrated Academic <br />
                            <span className="text-brand">
                                Management Environment
                            </span>
                        </h1>
                        <p className="max-w-3xl text-xl leading-relaxed font-medium text-gray-500 dark:text-gray-400">
                            Facilitating seamless administrative operations,
                            faculty instruction, and student advancement through
                            a unified digital infrastructure.
                        </p>
                    </div>

                    {/* Role-Based Access Modules */}
                    <div className="grid grid-cols-1 gap-8 md:grid-cols-3">
                        {/* Administrative Module */}
                        <RoleModule
                            icon={<ShieldCheck size={32} />}
                            title="Administrative Services"
                            description="Oversee institutional architecture, manage user credentials, and govern departmental hierarchies."
                            points={[
                                'Personnel Management',
                                'Academic Programs',
                                'Departmental Oversight',
                            ]}
                        />

                        {/* Faculty Module */}
                        <RoleModule
                            icon={<GraduationCap size={32} />}
                            title="Faculty Portal"
                            description="Facilitate academic excellence through grade computation, curriculum delivery, and student monitoring."
                            points={[
                                'Grade Certification',
                                'Curriculum Management',
                                'Academic Advising',
                            ]}
                        />

                        {/* Student Module */}
                        <RoleModule
                            icon={<BookOpen size={32} />}
                            title="Student Services"
                            description="Access essential academic resources, fulfill enrollment requirements, and monitor scholastic progress."
                            points={[
                                'Course Enrollment',
                                'Scholastic Records',
                                'Insurance Verification',
                            ]}
                        />
                    </div>
                </main>

                <footer className="mt-20 flex flex-col items-center justify-between gap-4 border-t border-gray-100 px-8 py-10 text-xs font-medium text-gray-400 md:flex-row lg:px-24 dark:border-[#1e1e1e]">
                    <p>
                        © 2026 Negros Oriental State University. Information
                        Technology Services.
                    </p>
                    <div className="flex gap-6">
                        <a
                            href="https://norsu.edu.ph/73"
                            className="transition hover:text-gray-600"
                        >
                            Privacy Policy
                        </a>
                        <a
                            href="https://norsu.edu.ph/80"
                            className="transition hover:text-gray-600"
                        >
                            Terms and Conditions
                        </a>
                    </div>
                </footer>
            </div>
        </>
    );
}

function RoleModule({ icon, title, description, points }) {
    return (
        <div className="group flex flex-col rounded-lg border border-gray-100 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-cyan-500/5 dark:border-[#1e1e1e] dark:bg-[#111]">
            <div className="brand mb-6 w-fit rounded-lg bg-gray-50 p-3 transition-colors group-hover:bg-cyan-50 dark:group-hover:bg-cyan-950/20">
                {icon}
            </div>
            <h3 className="mb-4 text-lg font-bold">{title}</h3>
            <p className="mb-6 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                {description}
            </p>
            <ul className="mb-8 flex-grow space-y-3">
                {points.map((point, i) => (
                    <li
                        key={i}
                        className="flex items-center text-xs font-semibold text-gray-600 dark:text-gray-300"
                    >
                        <ChevronRight size={14} className="mr-2 opacity-50" />
                        {point}
                    </li>
                ))}
            </ul>
        </div>
    );
}
