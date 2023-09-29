import React from 'react';
import MainMenuItem from '@/Shared/MainMenuItem';

export default ({ className }) => {
  return (
    <div className={className}>
      <MainMenuItem text="Dashboard" link="dashboard" icon="dashboard" />
      <MainMenuItem text="Customers" link="customers" icon="users" />
      <MainMenuItem text="Items" link="items" icon="book" />
      <MainMenuItem text="Order" link="orders" icon="shopping-cart" />
    </div>
  );
};
