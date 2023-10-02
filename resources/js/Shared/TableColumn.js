import { InertiaLink } from '@inertiajs/inertia-react';
import React from 'react';

export default function TableColumn({
  columnValue,
  routeName,
  id,
  type = 'text'
}) {
  return (
    <td className="border-t">
      <InertiaLink
        href={route(routeName, id)}
        className="flex items-center px-6 py-4 focus:text-indigo-700 focus:outline-none"
      >
        {type == 'image' ? (
          <img
            src={columnValue}
            className="block w-5 h-5 mr-2 -my-2 rounded-full"
          />
        ) : (
          columnValue
        )}
      </InertiaLink>
    </td>
  );
}
