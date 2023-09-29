import React from 'react';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import Icon from '@/Shared/Icon';
import SearchFilter from '@/Shared/SearchFilter';
import Pagination from '@/Shared/Pagination';
import TableColumn from '@/Shared/TableColumn';

const Index = () => {
  const { orders } = usePage().props;
  const {
    data,
    meta: { links }
  } = orders;
  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">Orders</h1>
      <div className="flex items-center justify-between mb-6">
        <SearchFilter />
        <InertiaLink
          className="btn-indigo focus:outline-none"
          href={route('orders.create')}
        >
          <span>Create</span>
          <span className="hidden md:inline">Orders</span>
        </InertiaLink>
      </div>
      <div className="overflow-x-auto bg-white rounded shadow">
        <table className="w-full whitespace-nowrap">
          <thead>
            <tr className="font-bold text-left">
              <th className="px-6 pt-5 pb-4">Customer</th>
              <th className="px-6 pt-5 pb-4">Item</th>
              <th className="px-6 pt-5 pb-4">Status</th>
              <th className="px-6 pt-5 pb-4">Confirm price</th>
              <th className="px-6 pt-5 pb-4">Original price</th>
              <th className="px-6 pt-5 pb-4">Remark</th>
            </tr>
          </thead>
          <tbody>
            {data.map(
              ({
                id,
                item_id,
                customer_id,
                confirm_status,
                confirm_price,
                org_price,
                remark
              }) => {
                return (
                  <tr
                    key={id}
                    className="hover:bg-gray-100 focus-within:bg-gray-100"
                  >
                    <TableColumn
                      columnName={item_id}
                      routeName={'orders.edit'}
                      id={id}
                    />
                    <TableColumn
                      columnName={customer_id}
                      routeName={'orders.edit'}
                      id={id}
                    />
                    <TableColumn
                      columnName={confirm_status}
                      routeName={'orders.edit'}
                      id={id}
                    />
                    <TableColumn
                      columnName={confirm_price}
                      routeName={'orders.edit'}
                      id={id}
                    />
                    <TableColumn
                      columnName={org_price}
                      routeName={'orders.edit'}
                      id={id}
                    />
                    <TableColumn
                      columnName={remark}
                      routeName={'orders.edit'}
                      id={id}
                    />
                  </tr>
                );
              }
            )}
            {data.length === 0 && (
              <tr>
                <td className="px-6 py-4 border-t" colSpan="4">
                  No Orders found.
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
