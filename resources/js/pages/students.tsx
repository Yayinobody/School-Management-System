import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { DataTable } from '@/components/ui/data-table';
import { students } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { columns } from './student-components/student-columns';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Students',
        href: students(),
    },
];

interface Student {
    id: string;
    name: string;
    email: string;
    studentNumber: string;
    enrollmentStatus: string;
}
interface StudentProps {
    data: Student[];
}
export default function Students({ data }: StudentProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Students" />

            <div className="flex flex-col gap-4 p-4 pt-6 md:p-8">
                <div className="flex items-center justify-between">
                    <div className="space-y-1">
                        <h2 className="text-2xl font-bold tracking-tight">
                            Students
                        </h2>
                        <p className="text-sm text-muted-foreground">
                            View and manage your students directory and
                            permissions.
                        </p>
                    </div>
                </div>

                <div className="rounded-xl border bg-card text-card-foreground shadow-sm">
                    <div className="p-0">
                        {' '}
                        <DataTable columns={columns} data={data} />
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
