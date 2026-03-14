import { ColumnDef } from '@tanstack/react-table';
import { ArrowUpDown } from 'lucide-react';

import { MoreHorizontal } from 'lucide-react';

import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

export type Teacher = {
    id: string;
    fname: string;
    mname: string;
    lname: string;
    email: string;
    employeeNumber: string;
    department: string;
    program: string;
};
import { Copy, Eye, Pencil, Trash2 } from 'lucide-react';

export const columns: ColumnDef<Teacher>[] = [
    {
        accessorKey: 'fname',
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() =>
                        column.toggleSorting(column.getIsSorted() === 'asc')
                    }
                >
                    First Name
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            );
        },
    },
    {
        accessorKey: 'lname',
        header: 'Last Name',
    },
    {
        accessorKey: 'email',
        header: 'Email',
    },
    {
        accessorKey: 'employeeNumber',
        header: 'Employee Number',
    },
    {
        accessorKey: 'department',
        header: 'Department',
    },
    {
        accessorKey: 'program',
        header: 'Program',
    },
    {
        id: 'actions',
        cell: ({ row }) => {
            const teacher = row.original;

            return (
                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <Button variant="ghost" className="h-8 w-8 p-0">
                            <span className="sr-only">Open menu</span>
                            <MoreHorizontal className="h-4 w-4" />
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end" className="w-[160px]">
                        <DropdownMenuLabel>Actions</DropdownMenuLabel>

                        {/* Copy ID - Always useful for debugging */}
                        <DropdownMenuItem
                            onClick={() =>
                                navigator.clipboard.writeText(
                                    teacher.employeeNumber,
                                )
                            }
                        >
                            <Copy className="mr-2 h-4 w-4" />
                            Copy ID
                        </DropdownMenuItem>

                        <DropdownMenuSeparator />

                        {/* View */}
                        <DropdownMenuItem
                            onClick={() => console.log('View', teacher.id)}
                        >
                            <Eye className="mr-2 h-4 w-4" />
                            View Profile
                        </DropdownMenuItem>

                        {/* Update */}
                        <DropdownMenuItem
                            onClick={() => console.log('Edit', teacher.id)}
                        >
                            <Pencil className="mr-2 h-4 w-4" />
                            Edit Details
                        </DropdownMenuItem>

                        <DropdownMenuSeparator />

                        {/* Delete - Destructive */}
                        <DropdownMenuItem
                            className="text-destructive focus:text-destructive"
                            onClick={() => console.log('Delete', teacher.id)}
                        >
                            <Trash2 className="mr-2 h-4 w-4" />
                            Delete Teacher
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            );
        },
    },
];
