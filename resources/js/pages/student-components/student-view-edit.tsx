import { useForm } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import {
    Field,
    FieldDescription,
    FieldGroup,
    FieldLabel,
    FieldSet,
} from '@/components/ui/field';
import { Input } from '@/components/ui/input';
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { router } from '@inertiajs/react';

export default function StudentViewEdit({ data }: any) {
    const {
        data: formData,
        setData,
        put,
        processing,
        errors,
    } = useForm({
        fname: data.fname || '',
        mname: data.mname || '',
        lname: data.lname || '',
        gender: data.gender || '',
        studentNumber: data.studentNumber || '',
        year_level: data.year_level || '',
        program_code: data.program_code || '',
        birthday: data.birthday || '',
        enrollment: data.enrollment || '',
        enrollment_term: data.enrollment_term || '',
        enrollment_status: data.enrollment_status || '',
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put(route('studentUpdate', data.id));
    };

    return (
        <div className="w-full max-w-2xl p-6">
            <form onSubmit={submit} className="space-y-8">
                <FieldSet>
                    <h2 className="text-lg font-semibold">
                        Student Information
                    </h2>
                    <FieldDescription>
                        Update the official records for this student.
                    </FieldDescription>

                    <FieldGroup className="mt-4">
                        {/* Name Row */}
                        <div className="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <Field>
                                <FieldLabel htmlFor="fname">
                                    First Name
                                </FieldLabel>
                                <Input
                                    id="fname"
                                    value={formData.fname}
                                    onChange={(e) =>
                                        setData('fname', e.target.value)
                                    }
                                    required
                                />
                                {errors.fname && (
                                    <span className="text-sm text-destructive">
                                        {errors.fname}
                                    </span>
                                )}
                            </Field>
                            <Field>
                                <FieldLabel htmlFor="mname">
                                    Middle Name
                                </FieldLabel>
                                <Input
                                    id="mname"
                                    value={formData.mname}
                                    onChange={(e) =>
                                        setData('mname', e.target.value)
                                    }
                                />
                            </Field>
                            <Field>
                                <FieldLabel htmlFor="lname">
                                    Last Name
                                </FieldLabel>
                                <Input
                                    id="lname"
                                    value={formData.lname}
                                    onChange={(e) =>
                                        setData('lname', e.target.value)
                                    }
                                    required
                                />
                                {errors.lname && (
                                    <span className="text-sm text-destructive">
                                        {errors.lname}
                                    </span>
                                )}
                            </Field>
                        </div>

                        {/* Identifiers & Gender */}
                        <div className="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <Field>
                                <FieldLabel>Student Number</FieldLabel>
                                <Input
                                    value={formData.studentNumber}
                                    disabled
                                    className="bg-muted"
                                />
                            </Field>

                            <Field>
                                <FieldLabel>Gender</FieldLabel>
                                <Select
                                    value={formData.gender}
                                    onValueChange={(val) =>
                                        setData('gender', val)
                                    }
                                >
                                    <SelectTrigger>
                                        <SelectValue placeholder="Select" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="Male">
                                            Male
                                        </SelectItem>
                                        <SelectItem value="Female">
                                            Female
                                        </SelectItem>
                                        <SelectItem value="Other">
                                            Other
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                            </Field>

                            <Field>
                                <FieldLabel htmlFor="birthday">
                                    Birthday
                                </FieldLabel>
                                <Input
                                    id="birthday"
                                    type="date"
                                    value={formData.birthday}
                                    onChange={(e) =>
                                        setData('birthday', e.target.value)
                                    }
                                />
                            </Field>
                        </div>

                        {/* Academic Info */}
                        <div className="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <Field>
                                <FieldLabel htmlFor="program_code">
                                    Program Code
                                </FieldLabel>
                                <Input
                                    id="program_code"
                                    value={formData.program_code}
                                    onChange={(e) =>
                                        setData('program_code', e.target.value)
                                    }
                                />
                            </Field>
                            <Field>
                                <FieldLabel>Year Level</FieldLabel>
                                <Select
                                    value={formData.year_level?.toString()}
                                    onValueChange={(val) =>
                                        setData('year_level', val)
                                    }
                                >
                                    <SelectTrigger>
                                        <SelectValue placeholder="Select Year" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="FirstYear">
                                            1st Year
                                        </SelectItem>
                                        <SelectItem value="SecondYear">
                                            2nd Year
                                        </SelectItem>
                                        <SelectItem value="ThirdYear">
                                            3rd Year
                                        </SelectItem>
                                        <SelectItem value="FourthYear">
                                            4th Year
                                        </SelectItem>
                                        <SelectItem value="FifthYear">
                                            5th Year
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                            </Field>
                        </div>

                        {/* Enrollment Details */}
                        <div className="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <Field>
                                <FieldLabel htmlFor="enrollment_term">
                                    Enrollment Term
                                </FieldLabel>
                                <Input
                                    id="enrollment_term"
                                    value={formData.enrollment_term}
                                    onChange={(e) =>
                                        setData(
                                            'enrollment_term',
                                            e.target.value,
                                        )
                                    }
                                />
                            </Field>
                            <Field>
                                <FieldLabel>Enrollment Status</FieldLabel>
                                <Select
                                    value={formData.enrollment_status}
                                    onValueChange={(val) =>
                                        setData('enrollment_status', val)
                                    }
                                >
                                    <SelectTrigger>
                                        <SelectValue placeholder="Select status" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="Enrolled">
                                            Enrolled
                                        </SelectItem>
                                        <SelectItem value="Dropped">
                                            Dropped
                                        </SelectItem>
                                        <SelectItem value="Graduated">
                                            Graduated
                                        </SelectItem>
                                        <SelectItem value="Inactive">
                                            Inactive
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                            </Field>
                        </div>
                    </FieldGroup>
                </FieldSet>

                {/* Footer Actions */}
                <div className="flex items-center gap-4 border-t pt-4">
                    <Button type="submit" disabled={processing}>
                        {processing ? 'Saving...' : 'Update Student'}
                    </Button>
                    <Button
                        variant="outline"
                        type="button"
                        onClick={() => router.visit(`/students`)}
                    >
                        Cancel
                    </Button>
                </div>
            </form>
        </div>
    );
}
