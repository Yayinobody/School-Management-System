import {
    Clock8Icon,
    User2Icon,
    UserCircle2Icon,
    UserCogIcon,
} from 'lucide-react';

import StatisticsCard from '@/components/statistics-card';

// Statistics card data
const StatisticsCardData = [
    {
        icon: <User2Icon className="size-4" />,
        value: '42',
        title: 'Users',
        changePercentage: '+18.2%',
    },
    {
        icon: <UserCircle2Icon className="size-4" />,
        value: '8',
        title: 'Students',
        changePercentage: '-8.7%',
    },
    {
        icon: <UserCogIcon className="size-4" />,
        value: '27',
        title: 'Teachers',
        changePercentage: '+4.3%',
    },
    {
        icon: <Clock8Icon className="size-4" />,
        value: '13',
        title: 'Late Deliveries',
        changePercentage: '-2.5%',
    },
];

const StatisticsCardPreview = () => {
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
