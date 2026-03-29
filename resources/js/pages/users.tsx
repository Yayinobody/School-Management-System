import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { DataTable } from '@/components/ui/data-table';
import { users } from '@/routes';
import type { BreadcrumbItem } from '@/types';

import { columns } from './user-components/user-columns';

const breadcrumbs: BreadcrumbItem[] = [{ title: 'User', href: users() }];

interface UserBasic {
    id: string;
    name: string;
    role: string;
    email: string;
    email_verified_at: string;
}

interface UserProps {
    data: UserBasic[];
}

export default function Users({ data }: UserProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Users" />

            <div className="flex flex-col gap-4 p-4 pt-6 md:p-8">
                <div className="flex items-center justify-between">
                    <div className="space-y-1">
                        <h2 className="text-2xl font-bold tracking-tight">
                            Users
                        </h2>
                        <p className="text-sm text-muted-foreground">
                            View and manage your students directory and
                            permissions.
                        </p>
                    </div>
                </div>

                <div className="rounded-xl border bg-card text-card-foreground shadow-sm">
                    <DataTable
                        columns={columns}
                        data={data}
                        filterColumn="name"
                    />
                </div>
            </div>
        </AppLayout>
    );
}
