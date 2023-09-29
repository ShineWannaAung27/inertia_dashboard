import React from 'react';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import Icon from '@/Shared/Icon';
import SearchFilter from '@/Shared/SearchFilter';
import Pagination from '@/Shared/Pagination';
import TableColumn from '@/Shared/TableColumn';

const Index = () => {
  const { customers } = usePage().props;
  const {
    data,
    meta: { links }
  } = customers;
  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">Customers</h1>
      <div className="flex items-center justify-between mb-6">
        <SearchFilter />
        <InertiaLink
          className="btn-indigo focus:outline-none"
          href={route('customers.create')}
        >
          <span>Create</span>
          <span className="hidden md:inline"> Customers</span>
        </InertiaLink>
      </div>
      <div className="overflow-x-auto bg-white rounded shadow">
        <table className="w-full whitespace-nowrap">
          <thead>
            <tr className="font-bold text-left">
              <th className="px-6 pt-5 pb-4">Name</th>
              <th className="px-6 pt-5 pb-4">Phone</th>
              <th className="px-6 pt-5 pb-4">Address</th>
            </tr>
          </thead>
          <tbody>
            {data.map(({ id, name, phone, address }) => {
              return (
                <tr
                  key={id}
                  className="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                  <TableColumn
                    columnName={name}
                    routeName={'customers.edit'}
                    id={id}
                  />
                  <TableColumn
                    columnName={phone}
                    routeName={'customers.edit'}
                    id={id}
                  />
                  <TableColumn
                    columnName={address}
                    routeName={'customers.edit'}
                    id={id}
                  />
                </tr>
              );
            })}
            {data.length === 0 && (
              <tr>
                <td className="px-6 py-4 border-t" colSpan="4">
                  No Items found.
                </td>
              </tr>
            )}
          </tbody>
        </table>
      </div>
      <Pagination links={links} />
    </div>
  );
};

Index.layout = page => <Layout title="Items" children={page} />;

export default Index;
