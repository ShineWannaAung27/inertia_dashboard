import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink, useForm, usePage } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import LoadingButton from '@/Shared/LoadingButton';
import TextInput from '@/Shared/TextInput';
import SelectInput from '@/Shared/SelectInput';
import TextAreaInput from '@/Shared/TextAreaInput';
import { Helmet } from 'react-helmet';
import DeleteButton from '@/Shared/DeleteButton';
import ConfirmButton from '@/Shared/ConfirmButton';

const Edit = () => {
  const { customerOrder, customers, items } = usePage().props;
  const { data, setData, errors, put, post, processing } = useForm({
    customer_id: customerOrder.customer_id || '',
    item_id: customerOrder.item_id || '',
    confirm_status: 0,
    confirm_price: customerOrder.confirm_price || '',
    org_price: customerOrder.org_price || '',
    remark: customerOrder.remark || ''
  });

  function handleSubmit(e) {
    e.preventDefault();
    put(route('orders.update', customerOrder));
  }
  function handleOrderConfirm(e) {
    e.preventDefault();
    put(route('orders.confirm', customerOrder));
  }
  
  function destroy() {
    if (confirm('Are you sure you want to delete this item?')) {
      Inertia.delete(route('orders.destroy', customerOrder));
    }
  }
  return (
    <div>
      <Helmet title={data.name} />
      <h1 className="mb-8 text-3xl font-bold">
        <InertiaLink
          href={route('orders')}
          className="text-indigo-600 hover:text-indigo-700"
        >
          orders
        </InertiaLink>
        <span className="mx-2 font-medium text-indigo-600">/</span>
        {customerOrder.name}
      </h1>
      <div className="max-w-3xl overflow-hidden bg-white rounded shadow">
        <form onSubmit={handleSubmit}>
          <div className="flex flex-wrap p-8 -mb-8 -mr-6">
            <SelectInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Customer"
              name="customer_id"
              errors={errors.customer_id}
              value={data.customer_id}
              onChange={e => setData('customer_id', e.target.value)}
            >
              <option value=""></option>
              {customers.map((customer, index) => {
                return (
                  <option key={index} value={customer.id}>
                    {customer.name}
                  </option>
                );
              })}
            </SelectInput>
            <SelectInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Item"
              name="item_id"
              errors={errors.item_id}
              value={data.item_id}
              onChange={e => setData('item_id', e.target.value)}
            >
              <option value=""></option>
              {items.map((item, index) => {
                return (
                  <option key={index} value={item.id}>
                    {item.name}
                  </option>
                );
              })}
            </SelectInput>
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Confirm price"
              name="confirm_price"
              type="number"
              min="0"
              errors={errors.confirm_price}
              value={data.confirm_price}
              onChange={e => setData('confirm_price', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Original Price"
              name="org_price"
              type="number"
              min="0"
              errors={errors.original_price}
              value={data.org_price}
              onChange={e => setData('org_price', e.target.value)}
            />
            <TextAreaInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Remark"
              name="remark"
              type="text"
              placeholder={'Remark Here'}
              errors={errors.remark}
              value={data.remark}
              onChange={e => setData('remark', e.target.value)}
            />
          </div>
          <div className="flex items-center px-8 py-4 bg-gray-100 border-t border-gray-200">
            <ConfirmButton onClick={handleOrderConfirm}>Confirm Order</ConfirmButton>
            <DeleteButton onDelete={destroy}>Delete Order</DeleteButton>
            <LoadingButton
              // loading={processing}
              type="submit"
              className="ml-auto btn-indigo"
            >
              Update Item
            </LoadingButton>
          </div>
        </form>
      </div>
    </div>
  );
};

Edit.layout = page => <Layout title="Update Order" children={page} />;

export default Edit;
