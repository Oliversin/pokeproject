import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm, Link } from '@inertiajs/react';




export default function Create( props) {
    const { data, setData, errors, post } = useForm({
        name: "",
        generation: "",
        types: "",
    });

    function handleSubmit(e) {
        e.preventDefault();
        post(route("pokemon.store"));
    }
    
    return (
        <AuthenticatedLayout
            user={props.auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Pokewea create</h2>}
        >
            <Head title="Pokewea" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
  
                            <div className="flex items-center justify-between mb-6">
                                <Link
                                    className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                    href={ route("pokemon.index") }
                                >
                                    Back
                                </Link>
                            </div>
  
                            <form name="createForm" onSubmit={handleSubmit}>
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <label className="">Name</label>
                                        <input
                                            type="text"
                                            className="w-full px-4 py-2"
                                            label="name"
                                            name="name"
                                            value={data.name}
                                            onChange={(e) =>
                                                setData("name", e.target.value)
                                            }
                                        />
                                        <span className="text-red-600">
                                            {errors.name}
                                        </span>
                                    </div>
                                    <div className="mb-0">
                                        <label className="">Generation</label>
                                        <textarea
                                            type="text"
                                            className="w-full rounded"
                                            label="generation_id"
                                            name="generation_id"
                                            errors={errors.generation}
                                            value={data.generation}
                                            onChange={(e) =>
                                                setData("generation", e.target.value)
                                            }
                                        />
                                        <span className="text-red-600">
                                            {errors.generation}
                                        </span>
                                    </div>
                                    <div className="mb-4">
                                        <label className="">Type</label>
                                        <input
                                            type="text"
                                            className="w-full px-4 py-2"
                                            label="Type"
                                            name="type"
                                            value={data.type}
                                            onChange={(e) =>
                                                setData("title", e.target.value)
                                            }
                                        />
                                        <span className="text-red-600">
                                            {errors.type}
                                        </span>
                                    </div>
                                </div>
                                <div className="mt-4">
                                    <button
                                        type="submit"
                                        className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                    >
                                        Save
                                    </button>
                                </div>
                            </form>
  
                        </div>
                    </div>
                </div>
            </div>

            
        </AuthenticatedLayout>
    );
}
