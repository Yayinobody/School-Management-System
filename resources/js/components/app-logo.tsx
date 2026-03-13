import AppLogoIcon from '@/components/app-logo-icon';

export default function AppLogo() {
    return (
        <>
            <div className="flex aspect-square size-8 items-center justify-center">
                <AppLogoIcon />
            </div>
            <div className="ml-1 grid flex-1 text-left text-sm">
                {/*<span className="mb-0.5 truncate leading-tight font-semibold">
                    Norsu Portal{' '}
                </span>*/}

                <span className="text tracking-tigh text-xl font-bold text-brand uppercase">
                    NORSU{' '}
                    <span className="font-light text-gray-500">Portal</span>
                </span>
            </div>
        </>
    );
}
