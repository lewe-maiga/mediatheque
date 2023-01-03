import { createResource, For } from "solid-js";

export const CDs: Component<Props> = (props) => {
    const fetcher = (url: string) =>
        fetch(`/api/cds?search=${url}`).then((res) => res.json());
    const [data] = createResource<CD[], string>(props.text, fetcher);
    return (
        <ul class="grid sm:grid-cols-2 xl:grid-cols-3 p-8 gap-3">
            <For each={data()} fallback={<p>loading</p>}>
                {(el) => (
                    <li class="flex my-2 border rounded p-4">{el.title}</li>
                )}
            </For>
        </ul>
    );
};
