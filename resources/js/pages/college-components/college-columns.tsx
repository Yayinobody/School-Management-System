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
        accessorKey: 'code',
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() =>
                        column.toggleSorting(column.getIsSorted() === 'asc')
                    }
                >
                    Code
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            );
        },
    },
    {
        accessorKey: 'title',
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() =>
                        column.toggleSorting(column.getIsSorted() === 'asc')
                    }
                >
                    Title
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            );
        },
    },
    {
        accessorKey: 'college_code',
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() =>
                        column.toggleSorting(column.getIsSorted() === 'asc')
                    }
                >
                    College Code
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            );
        },
    },
    {
        accessorKey: 'total_faculties',
        header: 'Total Faculties',
    },
    {
        accessorKey: 'total_enrollments',
        header: 'Total Enrollments',
    },
    {
        id: 'actions',
        cell: ({ row }) => {
            const college = row.original;

            return (
                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <Button variant="ghost" className="h-8 w-8 p-0">
                            <span className="sr-only">Open menu</span>
                            <MoreHorizontal className="h-4 w-4" />
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end" className="w-[160px]">
                        <DropdownMenuLabel> Actions</DropdownMenuLabel>

                        {/* Copy ID - Always useful for debugging */}
                        <DropdownMenuItem
                            onClick={() =>
                                navigator.clipboard.writeText(college.title)
                            }
                        >
                            <Copy className="mr-2 h-4 w-4" />
                            Copy Title
                        </DropdownMenuItem>

                        <DropdownMenuSeparator />

                        {/* View */}
                        <DropdownMenuItem
                            onClick={() => console.log('View', college.id)}
                        >
                            <Eye className="mr-2 h-4 w-4" />
                            View Profile
                        </DropdownMenuItem>

                        {/* Update */}
                        <DropdownMenuItem
                            onClick={() => console.log('Edit', college.id)}
                        >
                            <Pencil className="mr-2 h-4 w-4" />
                            Edit Details
                        </DropdownMenuItem>

                        <DropdownMenuSeparator />

                        {/* Delete - Destructive */}
                        <DropdownMenuItem
                            className="text-destructive focus:text-destructive"
                            onClick={() => console.log('Delete', college.id)}
                        >
                            <Trash2 className="mr-2 h-4 w-4" />
                            Delete College
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            );
        },
    },
];
