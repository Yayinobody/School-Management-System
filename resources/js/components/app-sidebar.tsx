import { Link } from '@inertiajs/react';
import {
    LayoutGrid,
    Calendar,
    Clock,
    Library,
    GraduationCap,
    BookOpen,
    ClipboardList,
    Users,
    UserCheck,
    ShieldCheck,
    FileSpreadsheet,
    School,
    DoorOpen,
    FileText,
    History,
    Settings,
} from 'lucide-react';

import AppLogo from '@/components/app-logo';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuItem,
    SidebarMenuButton,
} from '@/components/ui/sidebar';
const menuGroups = [
    {
        label: 'Dashboard',
        items: [{ title: 'Dashboard', href: '/dashboard', icon: LayoutGrid }],
    },
    {
        label: 'Academic Management',
        items: [
            {
                title: 'Colleges',
                href: '/academic/colleges',
                icon: Library,
            },
            {
                title: 'Programs',
                href: '/academic/programs',
                icon: GraduationCap,
            },
            { title: 'Subjects', href: '/academic/subjects', icon: BookOpen },
            {
                title: 'Curriculum',
                href: '/academic/curriculum',
                icon: ClipboardList,
            },
            { title: 'School Years', href: '/academic/years', icon: Calendar },
            {
                title: 'Terms / Semesters',
                href: '/academic/terms',
                icon: Clock,
            },
        ],
    },
    {
        label: 'People',
        items: [
            { title: 'Students', href: '/students', icon: Users },
            { title: 'Faculties', href: '/faculties', icon: UserCheck },
            { title: 'Users & Accounts', href: '/users', icon: ShieldCheck },
        ],
    },
    {
        label: 'Enrollment & Sections',
        items: [
            { title: 'Enrollment', href: '/enrollment', icon: FileSpreadsheet },
            { title: 'Sections', href: '/sections', icon: School },
            { title: 'Rooms', href: '/rooms', icon: DoorOpen },
        ],
    },
    {
        label: 'Grading',
        items: [
            { title: 'Grades', href: '/grades', icon: FileText },
            {
                title: 'Grade Reports',
                href: '/grades/reports',
                icon: ClipboardList,
            },
        ],
    },
    {
        label: 'Reports',
        items: [
            {
                title: 'Enrollment Report',
                href: '/reports/enrollment',
                icon: FileSpreadsheet,
            },
            { title: 'Grade Summary', href: '/reports/grades', icon: FileText },
            {
                title: 'Student Transcript',
                href: '/reports/transcript',
                icon: FileText,
            },
            {
                title: 'Room Utilization',
                href: '/reports/rooms',
                icon: DoorOpen,
            },
        ],
    },
    // {
    //     label: 'System',
    //     items: [
    //         {
    //             title: 'Permissions & Roles',
    //             href: '/system/roles',
    //             icon: ShieldCheck,
    //         },
    //         { title: 'Audit Logs', href: '/system/logs', icon: History },
    //         {
    //             title: 'System Settings',
    //             href: '/system/settings',
    //             icon: Settings,
    //         },
    //     ],
    // },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href="/dashboard" prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                {menuGroups.map((group) => (
                    <NavMain
                        key={group.label}
                        label={group.label}
                        items={group.items}
                        defaultOpen={
                            ![
                                'Academic Management',
                                'People',
                                'Enrollment & Sections',
                                'Grading',
                                'Reports',
                            ].includes(group.label)
                        }
                    />
                ))}
            </SidebarContent>

            <SidebarFooter>
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
