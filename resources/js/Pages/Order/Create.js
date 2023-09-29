import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink, useForm, usePage } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import LoadingButton from '@/Shared/LoadingButton';
import TextInput from '@/Shared/TextInput';
import SelectInput from '@/Shared/SelectInput';
import TextAreaInput from '@/Shared/TextAreaInput';

const Create = () => {
  const { customers, items } = usePage().props;
  const [itemPrice,setItemPrice] = useState();

  const { data, setData, errors, post, processing } = useForm({
    customer_id:'',
    item_id:'',
    confirm_status:0,
    confirm_price:'',
    org_price:'',
    remark:'',
  });

const handleItemChange =(value)=>{
  setData('item_id', value);
}

  function handleSubmit(e) {
    e.preventDefault();
    post(route('orders.store'));
  }
  return (
    <div>
      <h1 className="mb-8 text-3xl font-bold">
        <InertiaLink
          href={route('orders')}
          className="text-indigo-600 hover:text-indigo-700"
        >
          Order
        </InertiaLink>
        <span className="font-medium text-indigo-600"> /</span> Create
      </h1>
      <div className="max-w-3xl overflow-hidden bg-white rounded shadow">
        <form onSubmit={handleSubmit}>
          <div className="flex flex-wrap p-8 -mb-8 -mr-6">
            <SelectInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Customer"
              name="customer_id"
              errors={errors.customer}
              value={data.customer}
              onChange={e => setData('customer_id', e.target.value)}
            >
              <option value=""></option>
              {customers.map((customer, index) => {
                return <option key={index} value={customer.id}>{customer.name}</option>;
              })}
            </SelectInput>
            <SelectInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Item"
              name="item_id"
              errors={errors.customer}
              value={data.customer}
              onChange={e => handleItemChange(e.target.value)}
            >
              <option value=""></option>
              {items.map((item, index) => {
                return <option key={index} value={item.id}>{item.name}</option>;
              })}
            </SelectInput>
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Confirm price"
              name="confirm_price"
              type="number"
              errors={errors.confirm_price}
              value={data.confirm_price}
              onChange={e => setData('confirm_price', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Original Price"
              name="org_price"
              type="number"
              errors={errors.original_price}
              value={data.original_price}
              onChange={e => setData('org_price', e.target.value)}
            />
            <TextAreaInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Remark"
              name="remark"
              type="text"
              placeholder={"Remark Here"}
              errors={errors.remark}
              value={data.remark}
              onChange={e => setData('remark', e.target.value)}
            />
          </div>
          <div className="flex items-center justify-end px-8 py-4 bg-gray-100 border-t border-gray-200">
            <LoadingButton
              // loading={processing}
              type="submit"
              className="btn-indigo"
            >
              Create Order
            </LoadingButton>
          </div>
        </form>
      </div>
    </div>
  );
};

Create.layout = page => <Layout title="Create Order" children={page} />;

export default Create;
