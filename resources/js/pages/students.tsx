import { Head } from '@inertiajs/react';
import { useState } from 'react';
import AppLayout from '@/layouts/app-layout';
import { DataTable } from '@/components/ui/data-table';
import { Dialog, DialogContent } from '@/components/ui/dialog';
import { students, showStudent, showStudentSubjects } from '@/routes';
import type { BreadcrumbItem } from '@/types';

import { columns as makeColumns } from './student-components/student-columns';
import StudentViewEdit from './student-components/student-view-edit';
import StudentViewSubject from './student-components/student-view-subject';

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Students', href: students() }];

interface StudentBasic {
    id: string;
    fname: string;
    mname: string;
    lname: string;
    gender: string;
    student_number: string;
    year_level: string;
    program_code: string;
}

interface StudentDetail extends StudentBasic {
    birthday: string;
    enrollment?: string;
    enrollmentTerm?: string;
    enrollmentStatus?: string;
    subjects?: any[];
}

interface StudentsProps {
    data: StudentBasic[];
}

type ActiveTab = 'edit' | 'subjects' | null;

export default function Students({ data }: StudentsProps) {
    const [modalStudent, setModalStudent] = useState<StudentDetail | null>(
        null,
    );
    const [loading, setLoading] = useState(false);
    const [activeTab, setActiveTab] = useState<ActiveTab>(null);

    const handleCloseModal = () => {
        setModalStudent(null);
        setActiveTab(null);
    };

    const fetchStudentData = async (url: string) => {
        setLoading(true);
        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error('Failed to fetch data');
            return await response.json();
        } catch (error) {
            console.error(error);
            alert('Failed to load data.');
            return null;
        } finally {
            setLoading(false);
        }
    };

    const handleViewEdit = async (student: StudentBasic) => {
        setActiveTab('edit');
        const url = showStudent.url({ student: student.id });
        const studentData = await fetchStudentData(url);
        if (studentData) setModalStudent(studentData);
    };
    const handleViewSubject = async (student: StudentBasic) => {
        setActiveTab('subjects');
        const url = showStudentSubjects.url({ student: student.id });
        const subjects = await fetchStudentData(url);
        if (subjects)
            setModalStudent({ ...student, subjects } as StudentDetail);
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
                    <DataTable
                        columns={makeColumns({
                            onViewEdit: handleViewEdit,
                            onViewSubject: handleViewSubject,
                        })}
                        data={data}
                        filterColumn="student_number"
                    />

                    {modalStudent && (
                        <Dialog
                            open={!!modalStudent}
                            onOpenChange={handleCloseModal}
                        >
                            <DialogContent className="max-w-2xl overflow-hidden p-0">
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
                                                onClose={handleCloseModal}
                                            />
                                        ) : (
                                            <StudentViewSubject
                                                data={modalStudent}
                                                onClose={handleCloseModal}
                                            />
                                        )}
                                    </div>
                                )}
                            </DialogContent>
                        </Dialog>
                    )}
                </div>
            </div>
        </AppLayout>
    );
}
