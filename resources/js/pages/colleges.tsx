import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { DataTable } from '@/components/ui/data-table';
import { colleges } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { columns } from './college-components/college-columns';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Colleges',
        href: colleges(),
    },
];
interface College {
    id: string;
    code: string;
    title: string;
    total_programs: string;
    total_rooms: string;
    total_faculties: string;
}
interface CollegeProps {
    data: College[];
}
export default function Colleges({ data }: CollegeProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Colleges" />

            <div className="flex flex-col gap-4 p-4 pt-6 md:p-8">
                <div className="flex items-center justify-between">
                    <div className="space-y-1">
                        <h2 className="text-2xl font-bold tracking-tight">
                            Colleges
                        </h2>
                        <p className="text-sm text-muted-foreground">
                            View and manage your college directory and
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
                            filterColumn="code"
                        />
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
