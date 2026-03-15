import { Button } from '@/components/ui/button';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import { Badge } from '@/components/ui/badge';
import { ScrollArea } from '@/components/ui/scroll-area';

interface Subject {
    sectionCode: string;
    subjectCode: string;
    enrollmentStatus: string;
}

interface StudentViewSubjectProps {
    data: {
        name: string;
        subjects?: Subject[];
    } | null;
    onClose: () => void;
}

export default function StudentViewSubject({
    data,
    onClose,
}: StudentViewSubjectProps) {
    const subjects = data?.subjects || [];

    return (
        /* Use flex-col and max-h to prevent the Dialog from growing infinitely */
        <div className="flex max-h-[85vh] flex-col gap-4 p-6">
            <div className="flex shrink-0 flex-col gap-1">
                {' '}
                {/* shrink-0 keeps header fixed */}
                <h2 className="text-xl font-semibold tracking-tight">
                    Enrolled Subjects
                </h2>
                <p className="text-sm text-muted-foreground">
                    Academic record for{' '}
                    <span className="font-medium text-foreground">
                        {data?.name}
                    </span>
                </p>
            </div>

            <div className="flex-1 overflow-hidden rounded-md border">
                <ScrollArea className="h-[400px] w-full">
                    <Table>
                        <TableHeader className="sticky top-0 z-10 bg-secondary">
                            <TableRow>
                                <TableHead className="w-[150px]">
                                    Section Code
                                </TableHead>
                                <TableHead>Subject Code</TableHead>
                                <TableHead className="text-right">
                                    Status
                                </TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {subjects.length > 0 ? (
                                subjects.map((subject, index) => (
                                    <TableRow key={index}>
                                        <TableCell className="font-mono font-medium">
                                            {subject.sectionCode}
                                        </TableCell>
                                        <TableCell>
                                            {subject.subjectCode}
                                        </TableCell>
                                        <TableCell className="text-right">
                                            <Badge
                                                variant={
                                                    subject.enrollmentStatus ===
                                                    'Enrolled'
                                                        ? 'default'
                                                        : 'secondary'
                                                }
                                                className="capitalize"
                                            >
                                                {subject.enrollmentStatus}
                                            </Badge>
                                        </TableCell>
                                    </TableRow>
                                ))
                            ) : (
                                <TableRow>
                                    <TableCell
                                        colSpan={3}
                                        className="h-24 text-center"
                                    >
                                        No subjects found.
                                    </TableCell>
                                </TableRow>
                            )}
                        </TableBody>
                    </Table>
                </ScrollArea>
            </div>

            <div className="flex shrink-0 justify-end pt-2">
                <Button variant="outline" onClick={onClose}>
                    Close
                </Button>
            </div>
        </div>
    );
}
