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
interface StudentProps {
    data: {
        id: number;
        name: string;
        email: string;
        studentNumber: string;
        enrollment: string;
        enrollmentTerm: string;
        enrollmentStatus: string;
        subjects: Array<{
            sectionCode: string;
            subjectId: number;
            enrollmentStatus: string;
        }>;
    };
}

export default function StudentViewEdit({ data }: StudentProps) {
    const {
        data: formData,
        setData,
        put,
        processing,
        errors,
    } = useForm({
        name: data.name,
        email: data.email,
        studentNumber: data.studentNumber,
        enrollmentStatus: data.enrollmentStatus,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        // Assuming you have an update route: Route::put('/students/{student}', ...)
        put(route('studentUpdate', data.id));
    };

    return (
        <div className="w-full max-w-2xl p-6">
            <form onSubmit={submit}>
                <FieldGroup>
                    <FieldSet>
                        <h2 className="text-lg font-semibold">
                            Student Information
                        </h2>
                        <FieldDescription>
                            Update the official records for this student.
                        </FieldDescription>

                        <FieldGroup className="mt-4">
                            {/* Full Name */}
                            <Field>
                                <FieldLabel htmlFor="name">
                                    Full Name
                                </FieldLabel>
                                <Input
                                    id="name"
                                    value={formData.name}
                                    onChange={(e) =>
                                        setData('name', e.target.value)
                                    }
                                    required
                                />
                                {errors.name && (
                                    <span className="text-sm text-destructive">
                                        {errors.name}
                                    </span>
                                )}
                            </Field>

                            {/* Email */}
                            <Field>
                                <FieldLabel htmlFor="email">
                                    Email Address
                                </FieldLabel>
                                <Input
                                    id="email"
                                    type="email"
                                    value={formData.email}
                                    onChange={(e) =>
                                        setData('email', e.target.value)
                                    }
                                    required
                                />
                            </Field>

                            <div className="grid grid-cols-2 gap-4">
                                {/* Student Number (Read Only if needed) */}
                                <Field>
                                    <FieldLabel>Student Number</FieldLabel>
                                    <Input
                                        value={formData.studentNumber}
                                        disabled
                                    />
                                </Field>

                                {/* Enrollment Status Select */}
                                <Field>
                                    <FieldLabel>Status</FieldLabel>
                                    <Select
                                        value={formData.enrollmentStatus}
                                        onValueChange={(val) =>
                                            setData('enrollmentStatus', val)
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue placeholder="Select status" />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectGroup>
                                                <SelectItem value="Enrolled">
                                                    Enrolled
                                                </SelectItem>
                                                <SelectItem value="Dropped">
                                                    Dropped
                                                </SelectItem>
                                                <SelectItem value="Graduated">
                                                    Graduated
                                                </SelectItem>
                                            </SelectGroup>
                                        </SelectContent>
                                    </Select>
                                </Field>
                            </div>
                        </FieldGroup>
                    </FieldSet>

                    {/* Program Info (Read Only Section) */}
                    <div className="grid grid-cols-1 gap-4 rounded-xl border bg-card p-4 shadow-sm sm:grid-cols-2">
                        <div className="space-y-1">
                            <p className="text-xs font-medium tracking-wider text-muted-foreground uppercase">
                                Program
                            </p>
                            <p className="text-sm font-semibold text-foreground">
                                {data.enrollment}
                            </p>
                        </div>
                        <div className="space-y-1">
                            <p className="text-xs font-medium tracking-wider text-muted-foreground uppercase">
                                Term
                            </p>
                            <p className="text-sm font-semibold text-foreground">
                                {data.enrollmentTerm}
                            </p>
                        </div>
                    </div>

                    <div className="flex items-center gap-4">
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
                </FieldGroup>
            </form>
        </div>
    );
}
