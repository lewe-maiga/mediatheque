import { createResource, For, Show } from "solid-js";
import { generateArray } from "../libs";
import { Grid } from "./grid";

type NewsPaperProps = Props & { withMicrofilm: () => boolean };

export const NewsPapers: Component<NewsPaperProps> = (props) => {
    const fetcher = (url: string) =>
        fetch(`/newspapers?search=${url}`).then((res) => res.json());
    const [data] = createResource<NewsPaper[], string>(props.text, fetcher);
    return (
        <>
            <Show when={data.loading}>
                <Grid>
                    <For each={generateArray(20)}>
                        {() => (
                            <li class="flex flex-col my-2 border rounded p-4">
                                <span class="h-3 w-full bg-gray-400 animate-pulse" />
                                <span class=" mt-4 h-3 w-1/3 bg-gray-400 animate-pulse" />
                            </li>
                        )}
                    </For>
                </Grid>
            </Show>
            <Show when={data.error}>error</Show>
            <Show
                when={typeof data() !== "undefined" && !data.loading && data()}
            >
                <ul class="grid sm:grid-cols-2 xl:grid-cols-3 p-8 gap-3">
                    <For
                        each={
                            props.withMicrofilm()
                                ? data()?.filter(
                                      (el) => el.microfilm_id !== null
                                  )
                                : data()
                        }
                    >
                        {(el) => (
                            <li class="flex my-2 border rounded p-4">
                                {el?.title}
                            </li>
                        )}
                    </For>
                </ul>
            </Show>
        </>
    );
};
