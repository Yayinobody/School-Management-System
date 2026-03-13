import {
    Clock8Icon,
    User2Icon,
    UserCircle2Icon,
    UserCogIcon,
} from 'lucide-react';

import StatisticsCard from '@/components/statistics-card';

interface StatisticsCardPreviewProps {
    userCount: number;
    studentCount: number;
    teacherCount: number;
    departmentCount: number;
}
const StatisticsCardPreview = ({
    userCount,
    studentCount,
    teacherCount,
    departmentCount,
}: StatisticsCardPreviewProps) => {
    const StatisticsCardData = [
        {
            icon: <User2Icon className="size-4" />,
            value: userCount.toString(),
            title: 'Users',
            changePercentage: '+18.2%',
        },
        {
            icon: <UserCircle2Icon className="size-4" />,
            value: studentCount.toString(),
            title: 'Students',
            changePercentage: '-8.7%',
        },
        {
            icon: <UserCogIcon className="size-4" />,
            value: teacherCount.toString(),
            title: 'Teachers',
            changePercentage: '+4.3%',
        },
        {
            icon: <Clock8Icon className="size-4" />,
            value: departmentCount.toString(),
            title: 'Departments',
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
