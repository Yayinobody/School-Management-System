import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { DataTable } from '@/components/ui/data-table';
import { faculties } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { columns } from './faculty-components/faculty-columns';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Faculties',
        href: faculties(),
    },
];

interface Faculty {
    id: string;
    fname: string;
    mname: string;
    lname: string;
    gender: string;
    employeeNumber: string;
    program: string;
}
interface FacultyProps {
    data: Faculty[];
}
export default function Faculties({ data }: FacultyProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Faculties" />

            <div className="flex flex-col gap-4 p-4 pt-6 md:p-8">
                <div className="flex items-center justify-between">
                    <div className="space-y-1">
                        <h2 className="text-2xl font-bold tracking-tight">
                            Faculties
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
                        <DataTable
                            columns={columns}
                            data={data}
                            filterColumn="employee_number"
                        />
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
