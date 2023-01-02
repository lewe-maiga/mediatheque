import { createSignal, Show } from "solid-js";

export const AddMicrofilm = () => {
    const [isActive, setActive] = createSignal(false);

    return (
        <>
            <Show when={!isActive()}>
                <button
                    onClick={() => setActive(true)}
                    type="button"
                    class="bg-gray-300 rounded text-white hover:bg-gray-400 flex items-center justify-center p-2"
                >
                    Ajouter un Microfilm
                </button>
            </Show>
            <Show when={isActive()}>
                <div class="flex flex-col">
                    <label class="mb-2" for="duration">
                        Durée (en minute)
                    </label>
                    <input
                        id="duration"
                        name="duration"
                        placeholder="ex: 180"
                        type="number"
                        required
                        class="w-full rounded border border-gray-300 py-2 px-4"
                    />
                    <button type="button" onClick={() => setActive(false)}>
                        Annuler
                    </button>
                </div>
            </Show>
        </>
    );
};
