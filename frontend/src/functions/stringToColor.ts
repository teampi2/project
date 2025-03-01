export default function stringToColor(str: string): string {
  let hash = 5381
  for (let i = 0; i < str.length; i++)
    hash = (hash << 5) + hash + str.charCodeAt(i)

  const hue = Math.floor(Math.abs(Math.sin(hash) * 10000) % 360)

  return `hsl(${hue}, 70%, 50%)`
}
