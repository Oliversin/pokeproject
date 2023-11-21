import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

import React from 'react';
import TextInput from '../../Components/TextInput';
import InputLabel from '../../Components/InputLabel';
import PrimaryButton from '../../Components/PrimaryButton';

export default function Index({ auth, poke, pokemon }) {
    
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Pokewea</h2>}
        >
            <Head title="Pokewea" />

            <div className="py-8 ">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="text-center p-6 text-gray-900 font-bold text-xl">{pokemon.id} {pokemon.name}</div>
                        <form id='my-form' >
                            <div className="p-6 text-gray-900 grid grid-cols-4">
                                <div className='px-6'>
                                    <InputLabel className='font-bold px-6 pb-2'>Nombre</InputLabel>
                                    <TextInput className='mx-6 mb-4' name='name' defaultValue={pokemon.name} /> 
                                </div>
                                <div className='px-6'>
                                    <InputLabel className='font-bold px-6 pb-2'>Gen</InputLabel>
                                    <TextInput className='mx-6 mb-4'  name='generation' defaultValue={pokemon.generation.name} /> 
                                </div>
                                
                                        
                            </div>

                            <div className="px-6 text-gray-900 grid grid-cols-4">
                                <div className='px-6'>
                                <InputLabel className='px-4 pb-2'>Types</InputLabel>
                            { pokemon.types.map((type) => (<TextInput className='mx-6 mb-4' key={type.id}  name='types[]' defaultValue={type.name} /> ))}
                                </div>
            
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
