import { InertiaLink } from '@inertiajs/inertia-react';
import React from 'react';

export default function TableColumn({ columnName,routeName,id }) {
  return (
    <td className="border-t">
      <InertiaLink
        href={route(routeName, id)}
        className="flex items-center px-6 py-4 focus:text-indigo-700 focus:outline-none"
      >
        {columnName}
      </InertiaLink>
    </td>
  );
}
