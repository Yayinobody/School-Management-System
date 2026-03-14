import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { users } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import DataTableWithExportDemo from './user-components/user-table';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Users',
        href: users(),
    },
];

interface UserProps {
    users: {
        id: number;
        name: string;
        email: string;
    }[];
}
export default function User({ users }: UserProps) {
    return (
        <AppLayout>
            <Head title="Users" />
            <DataTableWithExportDemo users={users} />
        </AppLayout>
    );
}
