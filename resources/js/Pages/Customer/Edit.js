import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink, useForm, usePage } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import LoadingButton from '@/Shared/LoadingButton';
import TextInput from '@/Shared/TextInput';
import SelectInput from '@/Shared/SelectInput';
import TextAreaInput from '@/Shared/TextAreaInput';
import { Helmet } from 'react-helmet';

const Edit = () => {
  const { customer } = usePage().props;
  const { data, setData, errors,put, post, processing } = useForm({
    name:customer.name || '',
    phone:customer.phone || '',
    address:customer.address || '',
    
  });
  
  function handleSubmit(e) {
    e.preventDefault();
    put(route('customers.update', customer));
  }

  function destroy() {
    if (confirm('Are you sure you want to delete this item?')) {
      Inertia.delete(route('customers.destroy', customer));
    }
  }
  return (
    <div>
      <Helmet title={data.name} />
      <h1 className="mb-8 text-3xl font-bold">
        <InertiaLink
          href={route('customers')}
          className="text-indigo-600 hover:text-indigo-700"
        >
          Customers
        </InertiaLink>
        <span className="mx-2 font-medium text-indigo-600">/</span>
        {customer.name}
      </h1>
      <div className="max-w-3xl overflow-hidden bg-white rounded shadow">
        <form onSubmit={handleSubmit}>
        <div className="flex flex-wrap p-8 -mb-8 -mr-6">
           
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Name"
              name="name"
              type="text"
              errors={errors.name}
              value={data.name}
              onChange={e => setData('name', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Phone"
              name="phone"
              type="text"
              errors={errors.phone}
              value={data.phone}
              onChange={e => setData('phone', e.target.value)}
            />
            <TextAreaInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Address"
              name="address"
              type="text"
              placeholder={"Address Here"}
              errors={errors.address}
              value={data.address}
              onChange={e => setData('address', e.target.value)}
            />
          </div>
          <div className="flex items-center justify-end px-8 py-4 bg-gray-100 border-t border-gray-200">
            <LoadingButton
              // loading={processing}
              type="submit"
              className="btn-indigo"
            >
              Update Customer
            </LoadingButton>
          </div>
        </form>
      </div>
    </div>
  );
};

Edit.layout = page => <Layout title="Update Customers" children={page} />;

export default Edit;
