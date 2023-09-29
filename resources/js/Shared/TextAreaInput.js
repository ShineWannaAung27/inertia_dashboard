import React from 'react';

export default ({
  label,
  name,
  className,
  errors = [],
  onChange,
  value,
  placeholder
}) => {
  return (
    <div className={className}>
      {label && (
        <label
          className={`form-label  ${errors.length ? 'text-red-600' : ''}`}
          htmlFor={name}
        >
          {label}:
        </label>
      )}

      <textarea
        id={name}
        name={name}
        rows="4"
        onChange={onChange}
        value={value}
        className={`form-input ${
          errors.length ? 'error' : ''
        } block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500`}
        placeholder={placeholder}
      />
      {errors && <div className="form-error">{errors}</div>}
    </div>
  );
};
