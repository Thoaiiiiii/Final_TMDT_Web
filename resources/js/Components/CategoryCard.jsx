import React from "react";

const CategoryCard = ({ category }) => {
  return (
    <div className="bg-gray-100 rounded-lg p-6 text-center hover:shadow-md transition">
      <h3 className="text-xl font-semibold mb-2">{category.name}</h3>
      <p className="text-gray-600">{category.description}</p>
    </div>
  );
};

export default CategoryCard;
