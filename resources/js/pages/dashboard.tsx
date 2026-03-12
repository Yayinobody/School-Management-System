import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import StatisticsCardPreview from './dashboard-components/summary-component';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
    },
];

export default function Dashboard() {
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
                    <StatisticsCardPreview />
                </div>
            </div>
        </AppLayout>
    );
}
