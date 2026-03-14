import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import StatisticsCardPreview from './dashboard-components/summary';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
    },
];

interface SummaryProps {
    students: number;
    enrollments: number;
    sections: number;
    teachers: number;
}

export default function Dashboard({
    students,
    enrollments,
    sections,
    teachers,
}: SummaryProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="mt-10 ml-10 grid grid-cols-1 flex-col">
                <div className="flex justify-start text-2xl font-semibold">
                    {' '}
                    Summary
                </div>
                <div>
                    {' '}
                    <StatisticsCardPreview
                        studentCount={students}
                        enrollmentCount={enrollments}
                        sectionCount={sections}
                        teacherCount={teachers}
                    />
                </div>
            </div>
        </AppLayout>
    );
}
