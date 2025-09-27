import React, { useEffect, useState } from "react";
import Layout from "../Components/Layout";
import ProductCard from "../Components/ProductCard";
import CategoryCard from "../Components/CategoryCard";

const Home = () => {
  const [products, setProducts] = useState([]);  
  const [categories, setCategories] = useState([]); 

  useEffect(() => {
    // Gọi API products
    fetch("http://localhost:8000/api/products")
      .then((res) => res.json())
      .then((data) => setProducts(data))
      .catch((err) => console.error(err));

    // Gọi API categories
    fetch("http://localhost:8000/api/categories")
      .then((res) => res.json())
      .then((data) => setCategories(data))
      .catch((err) => console.error(err));
  }, []);

  return (
    <Layout>
      <div className="container mx-auto px-6 py-8">
        {/* Hero Section */}
        <section className="mb-12">
          <div className="bg-gray-100 rounded-lg p-8 text-center">
            <h1 className="text-4xl font-bold mb-4">Welcome to Shoe Store</h1>
            <p className="text-gray-600 mb-6">
              Discover our latest collection of trendy shoes
            </p>
            <button className="bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800">
              Shop Now
            </button>
          </div>
        </section>

        {/* Featured Products Section */}
        <section className="mb-12">
          <h2 className="text-2xl font-semibold mb-6">Featured Products</h2>
          <div className="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {products.length > 0 ? (
              products.map((p) => <ProductCard key={p.id} product={p} />)
            ) : (
              <p>Loading products...</p>
            )}
          </div>
        </section>

        {/* Categories Section */}
        <section className="mb-12">
          <h2 className="text-2xl font-semibold mb-6">Shop by Category</h2>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            {categories.length > 0 ? (
              categories.map((c) => <CategoryCard key={c.id} category={c} />)
            ) : (
              <p>Loading categories...</p>
            )}
          </div>
        </section>
      </div>
    </Layout>
  );
};

export default Home;