import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { useState } from 'react';
import { DataTable } from '@/components/ui/data-table';
import { students } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { columns as makeColumns } from './student-components/student-columns';
import StudentViewEdit from './student-components/student-view-edit';
import StudentViewSubject from './student-components/student-view-subject';
import { Dialog, DialogContent } from '@/components/ui/dialog';

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

interface FullStudent {
    id: number;
    name: string;
    email: string;
    studentNumber: string;
    enrollment: string;
    enrollmentTerm: string;
    enrollmentStatus: string;
}

interface StudentProps {
    data: Student[];
}

export default function Students({ data }: StudentProps) {
    const [modalStudent, setModalStudent] = useState<FullStudent | null>(null);
    const [loading, setLoading] = useState(false);
    const [activeTab, setActiveTab] = useState<'edit' | 'subjects' | null>(
        null,
    );

    const handleViewEdit = async (student: Student) => {
        setActiveTab('edit');
        setLoading(true);
        try {
            const response = await fetch(`/students/profile/${student.id}`);
            if (!response.ok) throw new Error('Failed to fetch student data');
            const fullStudent: FullStudent = await response.json();
            setModalStudent(fullStudent);
        } catch (error) {
            console.error(error);
            alert('Failed to load student details.');
        } finally {
            setLoading(false);
        }
    };

    const handleViewSubject = async (student: Student) => {
        setActiveTab('subjects');
        setLoading(true);
        try {
            const response = await fetch(`/students/subjects/${student.id}`);
            if (!response.ok)
                throw new Error('Failed to fetch student subjects');
            const subjectsData = await response.json();
            setModalStudent({
                ...student,
                subjects: subjectsData,
            } as any);
        } catch (error) {
            console.error(error);
            alert('Failed to load student subjects.');
        } finally {
            setLoading(false);
        }
    };

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
                        <DataTable
                            columns={makeColumns({
                                onViewSubject: handleViewSubject,
                                onViewEdit: handleViewEdit,
                            })}
                            data={data}
                        />

                        {/* Modal */}
                        {modalStudent && (
                            <Dialog
                                open={!!modalStudent}
                                onOpenChange={() => {
                                    setModalStudent(null);
                                    setActiveTab(null); // Reset tab on close
                                }}
                            >
                                <DialogContent className="max-w-2xl overflow-hidden p-0">
                                    {/* p-0 allows the components to control their own padding/spacing */}
                                    {loading ? (
                                        <div className="flex h-75 items-center justify-center">
                                            <p className="animate-pulse text-muted-foreground">
                                                Loading details...
                                            </p>
                                        </div>
                                    ) : (
                                        <div className="w-full">
                                            {activeTab === 'edit' ? (
                                                <StudentViewEdit
                                                    data={modalStudent}
                                                    onClose={() =>
                                                        setModalStudent(null)
                                                    }
                                                />
                                            ) : (
                                                <StudentViewSubject
                                                    data={modalStudent}
                                                    onClose={() =>
                                                        setModalStudent(null)
                                                    }
                                                />
                                            )}
                                        </div>
                                    )}
                                </DialogContent>
                            </Dialog>
                        )}
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
