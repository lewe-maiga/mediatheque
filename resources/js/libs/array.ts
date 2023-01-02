export const generateArray = (n: number) => [...Array(n).keys()];

export const dataSlice = <T>(data: Array<T>, opts: Opts) =>
    data.slice(opts.start, opts.end);
