import React from 'react';
import Helmet from 'react-helmet';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink, usePage, useForm } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import DeleteButton from '@/Shared/DeleteButton';
import LoadingButton from '@/Shared/LoadingButton';
import TextInput from '@/Shared/TextInput';

import TextAreaInput from '@/Shared/TextAreaInput';

const Edit = () => {
  const { item } = usePage().props;
  const { data, setData, errors, put, processing } = useForm({
    name: item.name || '',
    itemcode: item.itemcode || '',
    phone: item.phone || '',
    description: item.description || '',
    price: item.price || '',
    kyat: item.kyat || '',
    pae: item.pae || '',
    yway: item.yway || '',
    image: item.image || ''
  });

  function handleSubmit(e) {
    e.preventDefault();
    put(route('items.update', item));
  }

  function destroy() {
    if (confirm('Are you sure you want to delete this item?')) {
      Inertia.delete(route('items.destroy', item.id));
    }
  }
  return (
    <div>
      <Helmet title={data.name} />
      <h1 className="mb-8 text-3xl font-bold">
        <InertiaLink
          href={route('items')}
          className="text-indigo-600 hover:text-indigo-700"
        >
          Items
        </InertiaLink>
        <span className="mx-2 font-medium text-indigo-600">/</span>
        {item.name}
      </h1>

      <div className="max-w-3xl overflow-hidden bg-white rounded shadow">
        <form onSubmit={handleSubmit}>
          <div className="flex flex-wrap p-8 -mb-8 -mr-6">
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Name"
              name="name"
              errors={errors.name}
              value={data.name}
              onChange={e => setData('name', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Item Code"
              name="itemcode"
              type="itemcode"
              errors={errors.itemcode}
              value={data.itemcode}
              onChange={e => setData('itemcode', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Price"
              name="price"
              type="number"
              errors={errors.price}
              value={data.price}
              onChange={e => setData('price', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Kyat"
              name="kyat"
              type="number"
              errors={errors.kyat}
              value={data.kyat}
              onChange={e => setData('kyat', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Pae"
              name="pae"
              type="number"
              errors={errors.pae}
              value={data.pae}
              onChange={e => setData('pae', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Yway"
              name="yway"
              type="number"
              errors={errors.yway}
              value={data.yway}
              onChange={e => setData('yway', e.target.value)}
            />

            <TextAreaInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Description"
              name="description"
              type="text"
              errors={errors.description}
              value={data.description}
              onChange={e => setData('description', e.target.value)}
            />
          </div>
          <div className="flex items-center px-8 py-4 bg-gray-100 border-t border-gray-200">
            <DeleteButton onDelete={destroy}>Delete Item</DeleteButton>
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

Edit.layout = page => <Layout children={page} />;

export default Edit;
