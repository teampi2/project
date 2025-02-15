import * as React from 'react'
import { ClassesContext } from '@/contexts/ClassesContext'

export default function useClasses() {
  return React.useContext(ClassesContext)
}
