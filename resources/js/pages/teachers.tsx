import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { DataTable } from '@/components/ui/data-table';
import { teachers } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { columns } from './teacher-components/teacher-columns';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Teachers',
        href: teachers(),
    },
];

interface Teacher {
    id: string;
    fname: string;
    mname: string;
    lname: string;
    email: string;
    employeeNumber: string;
    department: string;
    program: string;
}
interface TeacherProps {
    data: Teacher[];
}
export default function Teachers({ data }: TeacherProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Teachers" />

            <div className="flex flex-col gap-4 p-4 pt-6 md:p-8">
                <div className="flex items-center justify-between">
                    <div className="space-y-1">
                        <h2 className="text-2xl font-bold tracking-tight">
                            Teachers
                        </h2>
                        <p className="text-sm text-muted-foreground">
                            View and manage your faculty directory and
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
