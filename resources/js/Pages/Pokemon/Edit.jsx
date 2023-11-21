import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm, usePage, Link } from '@inertiajs/react';

import TextInput from '../../Components/TextInput';
import InputLabel from '../../Components/InputLabel';
import PrimaryButton from '../../Components/PrimaryButton';

export default function Edit(props) {

    const { pokemon, generations } = usePage().props;
    const optionState = props.pokemon.generation_id;
    const { data, setData, put, errors } = useForm({
        name: pokemon.name || "",
        generation_id: pokemon.generation_id || "",
    });
  
    function handleSubmit(e) {
        e.preventDefault();
        put(route("pokemon.update", pokemon.id));
    }
    
    return (
        <AuthenticatedLayout
            user={props.auth.user}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight"> Edit Pokewea</h2>}
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
                                            {errors.title}
                                        </span>
                                    </div>
                                    <div className="mb-0">
                                        <label className="">generation_id</label>
                                        <select className="w-full rounded" label="generation_id" name="generation_id" id="gen-select" defaultValue={optionState} onChange={(e) => setData("generation_id", e.target.value)}>
                                        {generations.map((generation) => (
                                                <option key={generation.id} value={generation.id}> {generation.name} </option> 
                                            ))}
                                        </select>
                                        
                                        <span className="text-red-600">
                                            {errors.generations}
                                        </span>
                                    </div>
                                </div>
                                <div className="mt-4">
                                    <button
                                        type="submit"
                                        className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                    >
                                        Update
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
