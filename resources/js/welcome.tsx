import "../css/app.css";
import { render } from "solid-js/web";
import { createSignal, For, Match, Show, Switch } from "solid-js";
import { Books, NewsPapers, CDs } from "./components";

type Choose = "books" | "cds" | "newspapers";
const chooses = ["books", "cds", "newspapers"];
const App = () => {
    const auth = document.querySelector("#authenticated") as HTMLInputElement;

    const [choose, setChoose] = createSignal<Choose>(`books`);
    const [text, setText] = createSignal("");
    const [checked, setChecked] = createSignal(false);
    return (
        <main class="flex flex-col p-4">
            <div class="flex justify-between w-full">
                <div class="flex items-center">
                    <div class="flex border border-gray-300 rounded-[40px] justify-center items-center p-2 max-w-[600px] mr-2 focus-within:border-red-400 focus-within:text-red-400 text-gray-500">
                        <label for="search" class="">
                            <svg class="ml-2 w-5" viewBox="0 0 32 32">
                                <path
                                    fill="currentColor"
                                    d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z"
                                />
                            </svg>
                        </label>
                        <input
                            class="w-full border-none h-8 p-2 rounded mr-2 focus:outline-none border-transparent focus:border-transparent focus:ring-0"
                            type="text"
                            id="search"
                            value={text()}
                            onInput={(evt) => setText(evt.currentTarget.value)}
                        />
                    </div>
                    <select
                        class="h-10 border rounded p-2 border-gray-300"
                        onInput={(evt) => {
                            setChoose(evt.currentTarget.value as Choose);
                            setText("");
                        }}
                    >
                        <For each={chooses}>
                            {(el) => <option value={el}>{el}</option>}
                        </For>
                    </select>
                    <Show when={choose() !== "cds"}>
                        <div class="flex items-center ml-4">
                            <label for="checked">microfilm</label>
                            <input
                                onInput={(evt) =>
                                    setChecked(evt.currentTarget.checked)
                                }
                                id="checked"
                                type="checkbox"
                                class="rounded ml-2"
                            />
                        </div>
                    </Show>
                </div>
                <div>
                    <Show when={auth.value}>
                        <a
                            href="/dashboard"
                            class="text-sm text-gray-700 dark:text-gray-500 underline"
                        >
                            Dashboard
                        </a>
                    </Show>
                    <Show when={!auth.value}>
                        <a
                            href="/login"
                            class="text-sm text-gray-700 dark:text-gray-500 underline"
                        >
                            Log in
                        </a>

                        <a
                            href="/register"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                        >
                            Register
                        </a>
                    </Show>
                </div>
            </div>
            <Switch fallback={<p>not found</p>}>
                <Match when={choose() === "books"}>
                    <Books text={text} withMicrofilm={checked} />
                </Match>
                <Match when={choose() === "newspapers"}>
                    <NewsPapers text={text} withMicrofilm={checked} />
                </Match>
                <Match when={choose() === "cds"}>
                    <CDs text={text} />
                </Match>
            </Switch>
        </main>
    );
};

render(() => <App />, document.querySelector(".root") as HTMLElement);
