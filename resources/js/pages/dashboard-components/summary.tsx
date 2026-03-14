import {
    Clock8Icon,
    User2Icon,
    UserCircle2Icon,
    UserCogIcon,
} from 'lucide-react';

import StatisticsCard from '@/components/statistics-card';

interface StatisticsCardPreviewProps {
    studentCount: number;
    enrollmentCount: number;
    sectionCount: number;
    teacherCount: number;
}
const StatisticsCardPreview = ({
    studentCount,
    enrollmentCount,
    sectionCount,
    teacherCount,
}: StatisticsCardPreviewProps) => {
    const StatisticsCardData = [
        {
            icon: <User2Icon className="size-4" />,
            value: studentCount.toString(),
            title: 'Students',
            changePercentage: '+18.2%',
        },
        {
            icon: <UserCircle2Icon className="size-4" />,
            value: enrollmentCount.toString(),
            title: 'Enrollments',
            changePercentage: '-8.7%',
        },
        {
            icon: <UserCogIcon className="size-4" />,
            value: sectionCount.toString(),
            title: 'Sections',
            changePercentage: '+4.3%',
        },
        {
            icon: <Clock8Icon className="size-4" />,
            value: teacherCount.toString(),
            title: 'Teachers',
            changePercentage: '-2.5%',
        },
    ];

    return (
        <div className="py-2 sm:py-4 lg:py-6">
            <div className="mx-auto grid max-w-7xl gap-4 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">
                {StatisticsCardData.map((card, index) => (
                    <StatisticsCard
                        key={index}
                        icon={card.icon}
                        title={card.title}
                        value={card.value}
                        changePercentage={card.changePercentage}
                    />
                ))}
            </div>
        </div>
    );
};

export default StatisticsCardPreview;
