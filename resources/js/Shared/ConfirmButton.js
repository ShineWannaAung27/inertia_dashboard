import React from 'react';

export default ({ onClick, children }) => (
  <button
    className="text-yellow-600 focus:outline-none hover:underline mr-3"
    tabIndex="-1"
    type="button"
    onClick={onClick}
  >
    {children}
  </button>
);
