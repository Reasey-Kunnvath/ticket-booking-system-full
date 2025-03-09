export function formatDate(date: string | Date) {
  let value = date
  if (typeof value === 'string') {
    value = new Date(date)
  }
  return value.toDateString()
}
