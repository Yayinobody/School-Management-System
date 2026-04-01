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

import { Checkbox } from '@/components/ui/checkbox';

import { Copy, Eye, Pencil, Trash2 } from 'lucide-react';

export const columns: ColumnDef<any>[] = [
    {
        id: 'select',
        header: ({ table }) => (
            <Checkbox
                checked={
                    table.getIsAllPageRowsSelected() ||
                    (table.getIsSomePageRowsSelected() && 'indeterminate')
                }
                onCheckedChange={(value) =>
                    table.toggleAllPageRowsSelected(!!value)
                }
                aria-label="Select all"
            />
        ),
        cell: ({ row }) => (
            <Checkbox
                checked={row.getIsSelected()}
                onCheckedChange={(value) => row.toggleSelected(!!value)}
                aria-label="Select row"
            />
        ),
        enableSorting: false,
        enableHiding: false,
    },
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
        accessorKey: 'mname',
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() =>
                        column.toggleSorting(column.getIsSorted() === 'asc')
                    }
                >
                    Middle Name
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            );
        },
    },
    {
        accessorKey: 'lname',
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() =>
                        column.toggleSorting(column.getIsSorted() === 'asc')
                    }
                >
                    Last Name
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            );
        },
    },
    {
        accessorKey: 'employee_number',
        header: 'Employee Number',
    },
    {
        accessorKey: 'program_code',
        header: 'Program',
    },
    {
        id: 'actions',
        cell: ({ row }) => {
            const faculty = row.original;

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
                                    faculty.employeeNumber,
                                )
                            }
                        >
                            <Copy className="mr-2 h-4 w-4" />
                            Copy ID
                        </DropdownMenuItem>

                        <DropdownMenuSeparator />

                        {/* View */}
                        <DropdownMenuItem
                            onClick={() => console.log('View', faculty.id)}
                        >
                            <Eye className="mr-2 h-4 w-4" />
                            View Profile
                        </DropdownMenuItem>

                        {/* Update */}
                        <DropdownMenuItem
                            onClick={() => console.log('Edit', faculty.id)}
                        >
                            <Pencil className="mr-2 h-4 w-4" />
                            Edit Details
                        </DropdownMenuItem>

                        <DropdownMenuSeparator />

                        {/* Delete - Destructive */}
                        <DropdownMenuItem
                            className="text-destructive focus:text-destructive"
                            onClick={() => console.log('Delete', faculty.id)}
                        >
                            <Trash2 className="mr-2 h-4 w-4" />
                            Delete Faculty
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            );
        },
    },
];
