import * as React from 'react'
import { SchoolsContext } from '@/contexts/SchoolsContext'

export default function useSchools() {
  return React.useContext(SchoolsContext)
}
