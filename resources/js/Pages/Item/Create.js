import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink, useForm } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import LoadingButton from '@/Shared/LoadingButton';
import TextInput from '@/Shared/TextInput';
import SelectInput from '@/Shared/SelectInput';
import TextAreaInput from '@/Shared/TextAreaInput';

const Create = () => {
  const { data, setData, errors, post, processing } = useForm({
    name: '',
    itemcode: '',
    description: '',
    price: '',
    kyat: '',
    pae: '',
    yway: '',
    image: 'image.jpg',
  });

  function handleSubmit(e) {
    e.preventDefault();
    post(route('items.store'));
  }

  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">
        <InertiaLink
          href={route('items')}
          className="text-indigo-600 hover:text-indigo-700"
        >
          Items
        </InertiaLink>
        <span className="font-medium text-indigo-600"> /</span> Create
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
              placeholder={"Description Here"}
              errors={errors.description}
              value={data.description}
              onChange={e => setData('description', e.target.value)}
            />
          </div>
          <div className="flex items-center justify-end px-8 py-4 bg-gray-100 border-t border-gray-200">
            <LoadingButton
              // loading={processing}
              type="submit"
              className="btn-indigo"
            >
              Create Item
            </LoadingButton>
          </div>
        </form>
      </div>
    </div>
  );
};

Create.layout = page => <Layout title="Create Item" children={page} />;

export default Create;
