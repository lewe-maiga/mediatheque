import { createSignal, For, onCleanup, onMount, Show } from "solid-js";
import { createStore } from "solid-js/store";

type Props = {
    data: Author[];
};

export const Autocompletes: Component<Props> = (props) => {
    const [state] = createStore<string[]>(props.data.map((el) => el.name));
    const input = document.querySelector("#author") as HTMLInputElement;

    const [isActive, setActive] = createSignal(false);
    const [text, setText] = createSignal(input.value);

    const chooseAuthor = (author: string) => {
        input.value = author;
        setActive(false);
    };

    onMount(() => {
        input.addEventListener("input", () => {
            setText(input.value);
            setActive(true);
        });
        document.addEventListener("click", function (e) {
            setActive(false);
        });
    });

    onCleanup(() => {
        input.removeEventListener("input", () => {});
        input.removeEventListener("keydown", () => {});
        document.removeEventListener("click", () => {});
    });

    return (
        <>
            <Show when={isActive()}>
                <ul class="absolute border border-t-0 border-b-0 bg-white top-full left-0 right-0  p-2 z-[100]">
                    <For
                        each={state.filter((el) =>
                            el
                                .toLocaleLowerCase()
                                .includes(text().toLowerCase())
                        )}
                    >
                        {(el) => (
                            <li
                                onClick={[chooseAuthor, el]}
                                class={`p-4 cursor-pointer border-b border-gray-50 rounded hover:bg-green-200 ease-out duration-300  `}
                            >
                                {el}
                            </li>
                        )}
                    </For>
                </ul>
            </Show>
        </>
    );
};
